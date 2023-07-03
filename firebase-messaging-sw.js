//No lo tengo instalado por eso uso links
importScripts ("https://www.gstatic.com/firebasejs/9.23.0/firebase-app.js");
importScripts ("https://www.gstatic.com/firebasejs/9.23.0/firebase-messaging.js");

//Repito la configuración
const firebaseConfig = {
    apiKey: "AIzaSyBvoPNyKvFbeT45FSjnN3yRcljX2qz-7tQ",
    authDomain: "mis-brownies.firebaseapp.com",
    projectId: "mis-brownies",
    storageBucket: "mis-brownies.appspot.com",
    messagingSenderId: "902119157883",
    appId: "1:902119157883:web:052fa649d11575cefff2de"
  };
//Traigo la app y la instancia de messaging para trabajar con él
//const app = initializeApp(firebaseConfig);

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

//Me suscribo al evento para verlo en background
messaging.onBackgroundMessage(messaging, (payload) => {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    const notificationOptions = {
      body: payload.notification.body,
      icon: payload.notification.icon
    };
    self.registration.showNotification(payload.notification.title, notificationOptions);
});