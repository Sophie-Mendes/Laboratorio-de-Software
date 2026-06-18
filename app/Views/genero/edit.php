<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gênero</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background:#0f0f0f;
            color:#fff;
            min-height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            padding:20px;
        }

        .container{
            width:100%;
            max-width:600px;

            background:#1a1a1a;
            padding:35px;

            border-radius:16px;

            box-shadow:
                0 0 15px rgba(138,43,226,.3),
                0 0 30px rgba(138,43,226,.15);
        }

        h2{
            color:#b266ff;
            margin-bottom:20px;
        }

        hr{
            border:none;
            height:1px;
            background:#333;
            margin-bottom:25px;
        }

        form{
            display:flex;
            flex-direction:column;
            gap:15px;
        }

        label{
            color:#d7b4ff;
            font-weight:bold;
        }

        input[type="text"]{
            width:100%;
            padding:12px;

            border:none;
            border-radius:8px;

            background:#2a2a2a;
            color:white;
        }

        input[type="text"]:focus{
            outline:none;
            border:1px solid #8a2be2;
        }

        .buttons{
            display:flex;
            gap:10px;
            margin-top:10px;
        }

        button,
        .btn-voltar{
            text-decoration:none;

            background:#8a2be2;
            color:white;

            border:none;
            border-radius:8px;

            padding:12px 20px;
            cursor:pointer;

            transition:.3s;
            text-align:center;
        }

        button:hover{
            background:#9d4cff;
        }

        .btn-voltar{
            background:#333;
        }

        .btn-voltar:hover{
            background:#444;
        }

        @media(max-width:600px){
            .buttons{
                flex-direction:column;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h2>🎭 Editar Gênero #<?= $genero['id'] ?></h2>

    <hr>

    <?= form_open('GeneroController/salvar') ?>

        <label>Nome</label>

        <input
            type="text"
            name="nome"
            value="<?= $genero['nome'] ?>"
            required
        >

        <input
            type="hidden"
            name="id"
            value="<?= $genero['id'] ?>"
        >

        <div class="buttons">

            <button type="submit">
                Atualizar
            </button>

            <?= anchor(
                'GeneroController/index',
                'Voltar',
                ['class' => 'btn-voltar']
            ) ?>

        </div>

    <?= form_close() ?>

</div>

</body>
</html>