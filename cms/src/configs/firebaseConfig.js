// firebase.js
import { initializeApp } from 'firebase/app'

const firebaseConfig = {
  apiKey: 'AIzaSyDXKvRJvR-iac7B73wMLxq-6Un-7UXlmvk',
  authDomain: 'histudy-2024.firebaseapp.com',
  projectId: 'histudy-2024',
  storageBucket: 'histudy-2024.appspot.com',
  messagingSenderId: '1045236091632',
  appId: '1:1045236091632:web:270793b85a73547e861035'
}

// Initialize Firebase
const firebaseApp = initializeApp(firebaseConfig)

export default firebaseApp
