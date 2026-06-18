<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            background: #0b0b10;
            color: #fff;
        }

        .topbar {
            background: #12121a;
            padding: 18px 40px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(138,43,226,0.2);
        }

        .logo {
            font-weight: bold;
            font-size: 20px;
            color: #b266ff;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 70px 40px;
            background: radial-gradient(circle at top, #1a0f2e, #0b0b10);
        }

        .hero-text {
            max-width: 520px;
        }

        .hero-text h1 {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .hero-text p {
            color: #bdbdbd;
            line-height: 1.6;
        }

        .hero img {
            width: 260px;
            filter:
                brightness(0)
                invert(1)
                drop-shadow(0 0 15px rgba(138,43,226,0.4));
        }

        .section {
            padding: 50px 40px;
        }

        .section h2 {
            margin-bottom: 25px;
            color: #b266ff;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
        }

        .card {
            flex: 1 1 calc(25% - 25px);
            min-width: 220px;

            background: #15151f;
            border: 1px solid rgba(138,43,226,0.15);

            border-radius: 16px;
            min-height: 140px;

            text-decoration: none;
            color: white;

            position: relative;
            overflow: hidden;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            text-align: center;

            transition: all 0.3s ease;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #8a2be2, #4b0082);
            opacity: 0.25;
            transition: 0.4s;
        }

        .card:hover::before {
            left: 0;
        }

        .card:hover {
            transform: translateY(-6px);
            border-color: #8a2be2;
            box-shadow: 0 10px 25px rgba(138,43,226,0.25);
        }

        .card span {
            font-size: 42px;
            position: relative;
            z-index: 1;
            margin-bottom: 12px;
        }

        .card strong {
            color: #b266ff;
            font-size: 18px;
            position: relative;
            z-index: 1;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #777;
            font-size: 13px;
            border-top: 1px solid rgba(138,43,226,0.15);
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .card {
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>

    <div class="topbar">
        <div class="logo">📚 Biblioteca</div>
    </div>

    <div class="hero">
        <div class="hero-text">
            <h1>Seu sistema de biblioteca moderno</h1>
            <p>
                Gerencie livros, autores, usuários, editoras e empréstimos
                em um sistema rápido, simples e elegante.
            </p>
        </div>

        <img src="https://cdn-icons-png.flaticon.com/512/29/29302.png" alt="Livros">
    </div>

    <div class="section">
        <h2>📌 Módulos do sistema</h2>

        <div class="grid">

            <?php foreach($lista as $item) : ?>
                <a class="card" href="<?= base_url($item.'Controller/index') ?>">
                    <span>📂</span>
                    <strong><?= $item ?></strong>
                </a>
            <?php endforeach ?>

        </div>
    </div>

    <div class="footer">
        Sistema de Biblioteca • 
    </div>

</body>
</html>