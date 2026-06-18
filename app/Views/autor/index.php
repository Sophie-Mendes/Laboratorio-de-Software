<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>

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
            max-width:800px;

            background:#1a1a1a;
            padding:35px;

            border-radius:22px; /* 🔥 mais redondo */

            box-shadow:
                0 0 15px rgba(138,43,226,.3),
                0 0 30px rgba(138,43,226,.15);
        }

        h2{
            color:#b266ff;
            margin-bottom:15px;
        }

        h3{
            color:#d7b4ff;
            margin:25px 0 15px;
        }

        .btn-home{
            display:inline-block;
            text-decoration:none;

            background:#8a2be2;
            color:#fff;

            padding:10px 18px;
            border-radius:12px; /* 🔥 mais redondo */

            transition:.3s;
        }

        .btn-home:hover{
            background:#9d4cff;
            transform: translateY(-2px);
        }

        hr{
            border:none;
            height:1px;
            background:#333;
            margin:25px 0;
            border-radius:10px;
        }

        form{
            display:flex;
            gap:10px;
        }

        input[type="text"]{
            flex:1;

            padding:12px;
            border:none;
            border-radius:12px; /* 🔥 redondo */

            background:#2a2a2a;
            color:white;
        }

        input[type="text"]:focus{
            outline:none;
            border:1px solid #8a2be2;
        }

        button{
            background:#8a2be2;
            color:white;

            border:none;
            border-radius:12px; /* 🔥 redondo */

            padding:12px 20px;
            cursor:pointer;

            transition:.3s;
        }

        button:hover{
            background:#9d4cff;
            transform: translateY(-2px);
        }

        table{
            width:100%;
            border-collapse:separate;
            border-spacing:0;
            overflow:hidden;
            border-radius:14px; /* 🔥 redondo */
        }

        thead{
            background:#8a2be2;
        }

        th{
            text-align:left;
            padding:14px;
        }

        td{
            padding:14px;
            border-bottom:1px solid #333;
        }

        tbody tr{
            background:#202020;
            transition:.2s;
        }

        tbody tr:hover{
            background:#2b2b2b;
        }

        tbody tr:last-child td{
            border-bottom:none;
        }

        td a{
            color:#c99dff;
            text-decoration:none;
            font-weight:bold;

            padding:6px 10px;
            border-radius:8px;
            display:inline-block;
            transition:.3s;
        }

        td a:hover{
            color:white;
            background:#8a2be2;
        }

        @media(max-width:600px){

            form{
                flex-direction:column;
            }

            button{
                width:100%;
            }

            .container{
                padding:25px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Autores</h2>

    <?= anchor(
        'HomeController/index',
        '🏠 Home',
        ['class' => 'btn-home']
    ) ?>

    <hr>

    <h3>Novo Autor</h3>

    <?= form_open('AutorController/salvar/') ?>

        <input
            type="text"
            name="nome"
            placeholder="Digite o nome do autor"
            required
        >

        <button type="submit">
            Cadastrar
        </button>

    <?= form_close() ?>

    <h3>Lista de Autores</h3>

    <table>
        <thead>
            <tr>
                <th width="80">ID</th>
                <th>Nome</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($autores as $a) : ?>
                <tr>
                    <td><?= $a['id'] ?></td>
                    <td>
                        <?= anchor(
                            'AutorController/editar/'.$a['id'],
                            $a['nome']
                        ) ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

</body>
</html>