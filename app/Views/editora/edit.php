<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Editora</title>

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

        h3{
            color:#b266ff;
            margin-bottom:15px;
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
            gap:12px;
        }

        label{
            color:#d7b4ff;
            font-weight:bold;
        }

        input{
            width:100%;
            padding:12px;

            border:none;
            border-radius:8px;

            background:#2a2a2a;
            color:white;
        }

        input:focus{
            outline:none;
            border:1px solid #8a2be2;
        }

        .buttons{
            display:flex;
            gap:10px;
            margin-top:10px;
        }

        button,
        .btn-cancelar{
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

        .btn-cancelar{
            background:#333;
        }

        .btn-cancelar:hover{
            background:#444;
        }

        @media(max-width:700px){
            .buttons{
                flex-direction:column;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h3>🏢 Editora #<?= $editora['id'] ?></h3>

    <hr>

    <?= form_open('EditoraController/salvar') ?>

        <label>Nome</label>
        <input type="text" name="nome" value="<?= $editora['nome'] ?>">

        <label>Email</label>
        <input type="text" name="email" value="<?= $editora['email'] ?>">

        <label>Telefone</label>
        <input type="text" name="telefone" value="<?= $editora['telefone'] ?>">

        <input type="hidden" name="id" value="<?= $editora['id'] ?>">

        <div class="buttons">

            <button type="submit">Atualizar</button>

            <?= anchor(
                'EditoraController/index',
                'Cancelar',
                ['class' => 'btn-cancelar']
            ) ?>

        </div>

    <?= form_close() ?>

</div>

</body>
</html>