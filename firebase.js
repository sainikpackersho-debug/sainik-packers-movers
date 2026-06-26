import { initializeApp }
from "https://www.gstatic.com/firebasejs/12.0.0/firebase-app.js";

import { getFirestore }
from "https://www.gstatic.com/firebasejs/12.0.0/firebase-firestore.js";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDeS0Axy_4MTGkGmqs6U88bVo9w6cBi_nU",
  authDomain: "sainik-packers.firebaseapp.com",
  projectId: "sainik-packers",
  storageBucket: "sainik-packers.firebasestorage.app",
  messagingSenderId: "762661077456",
  appId: "1:762661077456:web:ce480790f8e67b83ebb9d5"
};

const app = initializeApp(firebaseConfig);

export const db = getFirestore(app);