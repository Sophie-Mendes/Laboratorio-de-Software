<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimos</title>

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
            max-width:1200px;

            background:#1a1a1a;
            padding:35px;

            border-radius:16px;

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
            border-radius:8px;

            transition:.3s;
        }

        .btn-home:hover{
            background:#9d4cff;
        }

        hr{
            border:none;
            height:1px;
            background:#333;
            margin:25px 0;
        }

        form{
            display:flex;
            flex-wrap:wrap;
            gap:10px;
            align-items:center;
        }

        label{
            color:#d7b4ff;
            font-weight:bold;
            margin-right:5px;
        }

        input,
        select{
            padding:10px;
            border:none;
            border-radius:8px;

            background:#2a2a2a;
            color:white;

            min-width:160px;
        }

        input:focus,
        select:focus{
            outline:none;
            border:1px solid #8a2be2;
        }

        button{
            background:#8a2be2;
            color:white;

            border:none;
            border-radius:8px;

            padding:12px 20px;

            cursor:pointer;
            transition:.3s;
        }

        button:hover{
            background:#9d4cff;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
            font-size:14px;
        }

        thead{
            background:#8a2be2;
        }

        th{
            padding:12px;
            text-align:left;
            white-space:nowrap;
        }

        td{
            padding:12px;
            border-bottom:1px solid #333;
            white-space:nowrap;
        }

        tbody tr{
            background:#202020;
            transition:.2s;
        }

        tbody tr:hover{
            background:#2b2b2b;
        }

        td a{
            color:#c99dff;
            text-decoration:none;
            font-weight:bold;
        }

        td a:hover{
            color:white;
        }

        .table-container{
            overflow-x:auto;
        }

        @media(max-width:900px){
            form{
                flex-direction:column;
                align-items:stretch;
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

    <h2>📚 Empréstimos</h2>

    <?= anchor(
        'HomeController/index',
        '🏠 Home',
        ['class' => 'btn-home']
    ) ?>

    <hr>

    <h3>Novo Empréstimo</h3>

    <?= form_open('EmprestimoController/salvar') ?>

        <input type="date" name="data_inicio">
        <input type="date" name="data_fim">

        <select name="id_usuario">
            <option value="" selected disabled>Usuário</option>
            <?php foreach($Usuario as $u) : ?>
                <option value="<?= $u['cpf'] ?>">
                    <?= $u['nome'] ?>
                </option>
            <?php endforeach ?>
        </select>

        <select name="id_livro">
            <option value="" selected disabled>Livro</option>
            <?php foreach($Livro as $l) : ?>
                <option value="<?= $l['id'] ?>">
                    <?= $l['isbn'] ?>
                </option>
            <?php endforeach ?>
        </select>

        <button type="submit">Cadastrar</button>

    <?= form_close() ?>

    <h3>Lista de Empréstimos</h3>

    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Livro</th>
                    <th>Usuário</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($Emprestimo as $e) : ?>
                    <tr>

                        <td>
                            <?= anchor(
                                'EmprestimoController/editar/'.$e['id'],
                                $e['id']
                            ) ?>
                        </td>

                        <td><?= $e['data_inicio'] ?></td>
                        <td><?= $e['data_fim'] ?></td>

                        <td>
                            <?php foreach($Livro as $l) : ?>
                                <?php if($e['id_livro'] == $l['id']) : ?>
                                    <?= $l['isbn'] ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </td>

                        <td>
                            <?php foreach($Usuario as $u) : ?>
                                <?php if($e['id_usuario'] == $u['cpf']) : ?>
                                    <?= $u['nome'] ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </td>

                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>

    </div>

</div>

</body>
</html>