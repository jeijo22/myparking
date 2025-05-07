import React from "react";
import Navbar from "./components/Navbar";
import fondo from './assets/parqueadero.jpg'; // <- Importa la imagen
import FormRegistro from "./components/FormRegistro";

function App() {
  return (
    <div
      style={{
        backgroundImage: `url(${fondo})`,
        backgroundSize: 'cover',
        backgroundRepeat: 'no-repeat',
        backgroundPosition: 'center',
        minHeight: '100vh',
        paddingTop: '80px', // Deja espacio para la barra de navegación
      }}
      >
    <Navbar />
    <div style={{ paddingTop: "20px" }}>
     <FormRegistro />
    </div>
    </div>
  );
}

export default App;
