import { db } from "./firebase.js";

import {
  collection,
  getDocs,
  doc,
  getDoc
} from "https://www.gstatic.com/firebasejs/12.0.0/firebase-firestore.js";

const categoryContainer =
  document.getElementById("categories");

let categories = [];
let items = [];
let settings = {};

let distanceKm = 5;
let pickupFloor = 0;
let dropFloor = 0;

let pickupLift = true;
let dropLift = true;

/* --------------------------
   TOTAL ITEMS
-------------------------- */

function getTotalItems() {
  return items.reduce(
    (sum, item) => sum + item.qty,
    0
  );
}

/* --------------------------
   TOTAL CFT
-------------------------- */

function getTotalCFT() {
  return items.reduce(
    (sum, item) =>
      sum + ((item.qty || 0) * (item.cft || 0)),
    0
  );
}

/* --------------------------
   VEHICLE LOGIC
-------------------------- */

function getVehicle() {

  const cft = getTotalCFT();

  if (cft <= 0) return "-";
  if (cft <= 250) return "Tata Ace";
  if (cft <= 500) return "Mahindra Pickup";

  return "14 Ft Truck";
}

/* --------------------------
   ESTIMATE
-------------------------- */
function getDistanceCharge() {

  const perKmRate =
    Number(
      settings.perKmRate || 0
    );

  return (
    distanceKm *
    perKmRate
  );

}
function getFloorCharge() {

  const rate =
    Number(
      settings.floorWithoutLiftRate || 0
    );

  let charge = 0;

  if (!pickupLift) {

    charge +=
      pickupFloor * rate;

  }

  if (!dropLift) {

    charge +=
      dropFloor * rate;

  }

  return charge;

}
function getEstimate() {

  const movingRate =
    Number(settings.movingRatePerCFT || 0);

  const packingRate =
    Number(settings.packingRatePerCFT || 0);

  const perKmRate =
    Number(settings.perKmRate || 0);

  const cft =
    getTotalCFT();

  const movingCharge =
    cft * movingRate;

  const packingCharge =
    cft * packingRate;

  const distanceCharge =
    distanceKm * perKmRate;

  const floorCharge =
    getFloorCharge();

  return (
    movingCharge +
    packingCharge +
    distanceCharge +
    floorCharge
  );

}

/* --------------------------
   SUMMARY
-------------------------- */

function updateSummary() {
    console.log(
  "Floor Charge:",
  getFloorCharge()
);
    console.log(
  "Distance KM:",
  distanceKm
);

console.log(
  "Distance Charge:",
  getDistanceCharge()
);

  const totalItemsElement =
    document.getElementById("totalItems");

  const estimateElement =
    document.getElementById("estimatePrice");

  if (totalItemsElement) {

    totalItemsElement.innerText =
      getTotalItems();

  }

  if (estimateElement) {

    estimateElement.innerText =
      "₹" +
      getEstimate().toLocaleString("en-IN");

  }

  console.clear();

  console.log(
    "Selected Items:",
    getTotalItems()
  );

  console.log(
    "Total CFT:",
    getTotalCFT()
  );

  console.log(
    "Vehicle:",
    getVehicle()
  );

  console.log(
    "Estimate:",
    getEstimate()
  );

}

/* --------------------------
   LOAD FIREBASE
-------------------------- */

async function loadData() {

  try {

    // Categories

    const categorySnap =
      await getDocs(
        collection(
          db,
          "inventory_categories"
        )
      );

    categories =
      categorySnap.docs.map(doc => ({
        id: doc.id,
        ...doc.data()
      }));


    // Inventory Items

    const itemSnap =
      await getDocs(
        collection(
          db,
          "inventory_items"
        )
      );

    items =
      itemSnap.docs.map(doc => ({
        id: doc.id,
        qty: 0,
        ...doc.data()
      }));


    // Settings

    const settingsDoc =
      await getDoc(
        doc(
          db,
          "calculator_settings",
          "city_move"
        )
      );

    if (settingsDoc.exists()) {

      settings =
        settingsDoc.data();

      console.log(
        "Settings Loaded:",
        settings
      );

    } else {

      console.log(
        "city_move document not found"
      );

    }

    renderInventory();

  }

  catch (error) {

    console.error(
      "Firebase Error:",
      error
    );

  }

}

/* --------------------------
   RENDER
-------------------------- */

function renderInventory() {

  categoryContainer.innerHTML = "";

  categories.forEach(category => {

    const categoryItems =
      items.filter(
        item =>
          item.categoryId === category.id
      );

let html = `

<div class="bg-white border border-slate-100 rounded-lg mb-2 overflow-hidden">

    <div class="px-3 py-2 flex items-center justify-between bg-slate-50">

        <h3 class="font-medium text-[11px] uppercase text-[#071B45]">

            ${category.name}

        </h3>

        <i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>

    </div>

    <div class="p-2">

`;

    categoryItems.forEach(item => {

      html += `

<div class="flex items-center justify-between py-1.5 border-b last:border-0">

    <span class="text-xs text-[#071B45] truncate">

        ${item.name}

    </span>

    <div class="flex items-center gap-1">

        <button
            class="minus w-5 h-5 rounded bg-slate-200 text-[10px]"
            data-id="${item.id}">
            -
        </button>

        <span class="text-xs font-semibold w-4 text-center">
            ${item.qty}
        </span>

        <button
            class="plus w-5 h-5 rounded bg-orange-500 text-white text-[10px]"
            data-id="${item.id}">
            +
        </button>

    </div>

</div>

`;

    });

    html += `
        </div>
      </div>
    `;

    categoryContainer.innerHTML += html;

  });

  bindEvents();
  updateSummary();
}

/* --------------------------
   EVENTS
-------------------------- */

function bindEvents() {

  document
    .querySelectorAll(".plus")
    .forEach(btn => {

      btn.addEventListener(
        "click",
        () => {

          const item =
            items.find(
              i => i.id === btn.dataset.id
            );

          if (item) {

            item.qty++;
            renderInventory();

          }

        }
      );

    });

  document
    .querySelectorAll(".minus")
    .forEach(btn => {

      btn.addEventListener(
        "click",
        () => {

          const item =
            items.find(
              i => i.id === btn.dataset.id
            );

          if (
            item &&
            item.qty > 0
          ) {

            item.qty--;
            renderInventory();

          }

        }
      );

    });

}

/* --------------------------
   START
-------------------------- */

loadData();
window.addEventListener("DOMContentLoaded", () => {

  const distanceSelect =
    document.getElementById("distanceKm");

  if (!distanceSelect) return;

  distanceSelect.addEventListener(
    "change",
    (e) => {

      distanceKm =
        Number(e.target.value);

      updateSummary();

    }
  );

});
const pickupFloorSelect =
  document.getElementById(
    "pickupFloor"
  );

if (pickupFloorSelect) {

  pickupFloorSelect.addEventListener(
    "change",
    (e) => {

      pickupFloor =
        Number(
          e.target.value
        );

      console.log(
        "Pickup Floor:",
        pickupFloor
      );
      updateSummary();

    }
  );

}


const dropFloorSelect =
  document.getElementById(
    "dropFloor"
  );
  

if (dropFloorSelect) {

  dropFloorSelect.addEventListener(
    "change",
    (e) => {

      dropFloor =
        Number(
          e.target.value
        );

      console.log(
        "Drop Floor:",
        dropFloor
      );
      updateSummary();

    }
  );

}


const pickupLiftCheckbox =
  document.getElementById(
    "pickupLift"
  );

if (pickupLiftCheckbox) {

  pickupLiftCheckbox.addEventListener(
    "change",
    (e) => {

      pickupLift =
        e.target.checked;

      console.log(
        "Pickup Lift:",
        pickupLift
      );
      console.log(
  "Pickup Floor:",
  pickupFloor
);

updateSummary();

    }
  );

}


const dropLiftCheckbox =
  document.getElementById(
    "dropLift"
  );

if (dropLiftCheckbox) {

  dropLiftCheckbox.addEventListener(
    "change",
    (e) => {

      dropLift =
        e.target.checked;

      console.log(
        "Drop Lift:",
        dropLift
      );
      console.log(
  "Pickup Floor:",
  pickupFloor
);

updateSummary();

    }
  );

}