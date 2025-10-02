<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Autos</title>
  <!-- Bootstrap local -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Iconos de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #1c1c1c, #2b2b2b, #121212);
      background-size: 400% 400%;
      animation: gradientBG 12s ease infinite;
      font-family: Arial, sans-serif;
    }

    @keyframes gradientBG {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }

    .form-box {
      background: #1c1c1c;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.6);
      max-width: 420px;
      width: 100%;
      text-align: center;
      border: 2px solid #FFD700;
    }

    .form-box h2 {
      margin-bottom: 20px;
      color: #FFD700;
      font-weight: bold;
    }

    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      background: #2b2b2b;
      border-radius: 10px;
      padding: 10px;
    }

    .input-group i {
      color: #FFD700;
      font-size: 1.2rem;
      margin-right: 10px;
    }

    .input-group input {
      background: transparent;
      border: none;
      outline: none;
      color: #f1f1f1;
      width: 100%;
      font-size: 1rem;
    }

    .input-group input::placeholder {
      color: #aaa;
    }

    .btn-custom {
      background: #FFD700;
      color: #000;
      font-weight: bold;
      border-radius: 10px;
      padding: 12px;
      width: 48%;
      border: none;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background: #e6c200;
      transform: scale(1.05);
    }

    .btn-secondary-custom {
      background: #fff;
      color: #000;
      font-weight: bold;
      border-radius: 10px;
      padding: 12px;
      width: 48%;
      border: none;
      transition: 0.3s;
    }

    .btn-secondary-custom:hover {
      background: #ddd;
      transform: scale(1.05);
    }

    .buttons {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }
  </style>
</head>
<body>
  
  <div class="form-box">
    <h2>🚗 Registro de Autos</h2>
    <form action="register.php" method="POST">
      <div class="input-group">
        <i class="bi bi-person-fill"></i>
        <input type="text" name="full_name" placeholder="Nombre completo" required>
      </div>
      <div class="input-group">
        <i class="bi bi-card-text"></i>
        <input type="text" name="document_id" placeholder="Documento de identidad" required>
      </div>
      <div class="input-group">
        <i class="bi bi-telephone-fill"></i>
        <input type="tel" name="contact_number" placeholder="Número de contacto" required>
      </div>
      <div class="input-group">
        <i class="bi bi-car-front-fill"></i>
        <input type="text" name="plate" placeholder="Placa del vehículo" required>
      </div>
      <div class="input-group">
        <i class="bi bi-clock-fill"></i>
        <input type="time" name="entry_time" id="entry_time" required>
      </div>
      
      <div class="buttons">
        <button type="submit" class="btn-custom">Registrar</button>
        <button type="button" class="btn-secondary-custom">Login</button>
      </div>
    </form>
  </div>

  <script>
    // autollenar hora actual
    window.onload = function() {
      const inputHora = document.getElementById("entry_time");
      const ahora = new Date();
      const horas = String(ahora.getHours()).padStart(2, '0');
      const minutos = String(ahora.getMinutes()).padStart(2, '0');
      inputHora.value = `${horas}:${minutos}`;
    }
  </script>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
