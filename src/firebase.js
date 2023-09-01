import { initializeApp } from "firebase/app";
import { getAuth, GoogleAuthProvider } from "firebase/auth";
import { getStorage } from "firebase/storage";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyASOFBp62k051UtDLrM8fgy22HO8CTGWtU",
  authDomain: "landr-d253b.firebaseapp.com",
  projectId: "landr-d253b",
  storageBucket: "landr-d253b.appspot.com",
  messagingSenderId: "69699328675",
  appId: "1:69699328675:web:528ba97aa4dc18a63e3d16"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

export const auth = getAuth(app);

export const storage = getStorage();

export const provider = new GoogleAuthProvider();
export default app;
