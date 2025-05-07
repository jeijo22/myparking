import React from 'react';
import './Navbar.css'; // Asegúrate de importar el archivo CSS

function Navbar() {
  return (
    <nav style={{
      backgroundColor: '#0d6efd', // Fondo azul
      color: 'white',
      padding: '0.2rem 0.5rem', 
      fontWeight: 'bold',
      fontSize: '1rem', // Tamaño de fuente de la barra de navegación
      fontFamily: 'Roboto, sans-serif', // Cambia el tipo de letra a "Roboto"
      position: 'absolute', // Hace que se quede fija en la parte superior
      top: 0, // Alinea al top
      left: 0, // Alinea al left
      width: '100%', // Asegura que ocupe todo el ancho
      animation: 'colorChange 5s infinite', // Agrega animación para el cambio de color
    }}>
         <h1 style={{ marginLeft: '20px' }}>SISTEMA DE PARQUEADERO MY PARKING</h1> {/* Alineado a la izquierda */}
         </nav>
  );
}   

export default Navbar;