import './LoginForm.css';

export default function LoginForm() {
  return (
    <div className="login-form">
      <h2>Iniciar Sesión</h2>
      <input type="text" placeholder="Usuario" />
      <input type="password" placeholder="Contraseña" />
      <button>Ingresar</button>
    </div>
  );
}

