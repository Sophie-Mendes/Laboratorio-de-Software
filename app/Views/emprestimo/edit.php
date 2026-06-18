<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empréstimo</title>

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
            max-width:650px;

            background:#1a1a1a;
            padding:35px;

            border-radius:16px;

            box-shadow:
                0 0 15px rgba(138,43,226,.3),
                0 0 30px rgba(138,43,226,.15);
        }

        h3{
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
            gap:12px;
        }

        label{
            color:#d7b4ff;
            font-weight:bold;
        }

        input,
        select{
            width:100%;
            padding:12px;

            border:none;
            border-radius:8px;

            background:#2a2a2a;
            color:white;
        }

        input:focus,
        select:focus{
            outline:none;
            border:1px solid #8a2be2;
        }

        .grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:12px;
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
            .grid{
                grid-template-columns:1fr;
            }

            .buttons{
                flex-direction:column;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h3>📚 Empréstimo #<?= $Emprestimo['id'] ?></h3>

    <hr>

    <?= form_open('EmprestimoController/salvar') ?>

        <div class="grid">

            <div>
                <label>Data de Início</label>
                <input type="date" name="data_inicio" value="<?= $Emprestimo['data_inicio'] ?>">
            </div>

            <div>
                <label>Data de Devolução</label>
                <input type="date" name="data_fim" value="<?= $Emprestimo['data_fim'] ?>">
            </div>

        </div>

        <label>Usuário</label>
        <select name="id_usuario">
            <option value="" disabled>Selecione...</option>
            <?php foreach($Usuario as $u) : ?>
                <option value="<?= $u['cpf'] ?>"
                    <?= ($Emprestimo['id_usuario'] == $u['cpf']) ? 'selected' : '' ?>>
                    <?= $u['nome'] ?>
                </option>
            <?php endforeach ?>
        </select>

        <label>Livro</label>
        <select name="id_livro">
            <option value="" disabled>Selecione...</option>
            <?php foreach($Livro as $l) : ?>
                <option value="<?= $l['id'] ?>"
                    <?= ($Emprestimo['id_livro'] == $l['id']) ? 'selected' : '' ?>>
                    <?= $l['isbn'] ?>
                </option>
            <?php endforeach ?>
        </select>

        <input type="hidden" name="id" value="<?= $Emprestimo['id'] ?>">

        <div class="buttons">

            <button type="submit">
                Atualizar
            </button>

            <?= anchor(
                'EmprestimoController/index',
                'Cancelar',
                ['class' => 'btn-cancelar']
            ) ?>

        </div>

    <?= form_close() ?>

</div>

</body>
</html>