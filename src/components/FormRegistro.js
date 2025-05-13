import React from "react";
import "./FormRegistro.css";

const FormRegistro = () => {
  return (
    <div className="form-container">
      <h2>Registro de clientes</h2>

      <div className="form-group">
        <i className="fas fa-user"></i>
        <input type="text" required placeholder=" " />
        <label>Nombre</label>
      </div>

      <div className="form-group">
        <i className="fas fa-envelope"></i>
        <input type="email" required placeholder=" " />
        <label>Correo electrónico</label>
      </div>

      <div className="form-group">
        <i className="fas fa-lock"></i>
        <input type="password" required placeholder=" " />
        <label>Contraseña</label>
      </div>

      <div className="forgot-password">
        ¿Olvidaste tu contraseña?{" "}
        <button className="link-button" onClick={() => alert("Funcionalidad futura")}>
          Haz clic aquí
        </button>
      </div>

      <div className="form-buttons">
        <button>
          <i className="fas fa-user-plus"></i> Registrarse
        </button>
        <button>
          <i className="fas fa-sign-in-alt"></i> Iniciar sesión
        </button>
      </div>
    </div>
  );
};

export default FormRegistro;

