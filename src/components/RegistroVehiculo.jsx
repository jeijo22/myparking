import React from "react";
import "./RegistroVehiculo.css";

const RegistroVehiculo = () => {
  return (
    <div className="form-wrapper">
      <h2>Registro de Vehículo</h2>
      <div className="underline"></div>
      <form className="registro-form" method="POST" action="http://localhost/myparking/registro_vehiculo.php">
        <div className="input-group">
          <i className="fas fa-id-card"></i>
          <input type="text" name="placa" placeholder="Placa del vehículo" required />
        </div>

        <div className="input-group">
          <i className="fas fa-car"></i>
          <input type="text" name="marca" placeholder="Marca" required />
        </div>

        <div className="input-group">
          <i className="fas fa-calendar-alt"></i>
          <input type="text" name="modelo" placeholder="Modelo" required />
        </div>

        <div className="input-group">
          <i className="fas fa-palette"></i>
          <input type="text" name="color" placeholder="Color" />
        </div>

        <div className="input-group">
          <i className="fas fa-user"></i>
          <input type="text" name="cedula_propietario" placeholder="Cédula del propietario" required />
        </div>

        <div className="button-group">
          <button className="btn green" type="submit">Registrar</button>
          <button className="btn white" type="button" onClick={() => window.location.href = "/login"}>Cancelar</button>
        </div>
      </form>
    </div>
  );
};

export default RegistroVehiculo;
