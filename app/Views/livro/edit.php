<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>

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

    <h3>📚 Livro #<?= $Livro['id'] ?></h3>

    <hr>

    <?= form_open('LivroController/salvar') ?>

        <div class="grid">

            <div>
                <label>ISBN</label>
                <input type="number" name="isbn" value="<?= $Livro['isbn'] ?>">
            </div>

            <div>
                <label>Páginas</label>
                <input type="number" name="paginas" value="<?= $Livro['paginas'] ?>">
            </div>

            <div>
                <label>Ano</label>
                <input type="number" name="ano" value="<?= $Livro['ano'] ?>">
            </div>

        </div>

        <label>Obra</label>
        <select name="id_obra">
            <option value="" disabled>Selecione...</option>
            <?php foreach($Obra as $o) : ?>
                <option value="<?= $o['id'] ?>"
                    <?= ($Livro['id_obra'] == $o['id']) ? 'selected' : '' ?>>
                    <?= $o['titulo'] ?>
                </option>
            <?php endforeach ?>
        </select>

        <label>Editora</label>
        <select name="id_editora">
            <option value="" disabled>Selecione...</option>
            <?php foreach($Editora as $e) : ?>
                <option value="<?= $e['id'] ?>"
                    <?= ($Livro['id_editora'] == $e['id']) ? 'selected' : '' ?>>
                    <?= $e['nome'] ?>
                </option>
            <?php endforeach ?>
        </select>

        <input type="hidden" name="id" value="<?= $Livro['id'] ?>">

        <div class="buttons">

            <button type="submit">
                Atualizar
            </button>

            <?= anchor(
                'LivroController/index',
                'Cancelar',
                ['class' => 'btn-voltar']
            ) ?>

        </div>

    <?= form_close() ?>

</div>

</body>
</html>