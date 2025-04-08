import React from "react";
import "./RegistroCliente.css";

const RegistroCliente = () => {
  return (
    <div className="form-wrapper">
      <h2>Registro</h2>
      <div className="underline"></div>
      <form className="registro-form">
        <div className="input-group">
          <i className="fas fa-user"></i>
          <input type="text" placeholder="Nombre" required />
        </div>

        <div className="input-group">
          <i className="fas fa-envelope"></i>
          <input type="email" placeholder="Correo" required />
        </div>

        <div className="input-group">
          <i className="fas fa-lock"></i>
          <input type="password" placeholder="Contraseña" required />
        </div>

        <p className="forgot-password">
          ¿Olvidaste tu contraseña? <a href="/ruta-valida">Haz clic aquí</a>

        </p>

        <div className="button-group">
          <button className="btn green">Registro</button>
          <button className="btn white">Login</button>
        </div>
      </form>
    </div>
  );
};

export default RegistroCliente;


