<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

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
            grid-template-columns: 1fr 1fr;
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

    <h2>👤 Usuário #<?= $Usuario['cpf'] ?></h2>

    <hr>

    <?= form_open('UsuarioController/salvar') ?>

        <label>CPF</label>
        <input type="number" name="cpf" value="<?= $Usuario['cpf'] ?>">

        <div class="grid">

            <div>
                <label>Nome</label>
                <input type="text" name="nome" value="<?= $Usuario['nome'] ?>">
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?= $Usuario['email'] ?>">
            </div>

            <div>
                <label>Telefone</label>
                <input type="number" name="telefone" value="<?= $Usuario['telefone'] ?>">
            </div>

            <div>
                <label>Data de Nascimento</label>
                <input type="date" name="data_nascimento" value="<?= $Usuario['data_nascimento'] ?>">
            </div>

        </div>

        <label>Endereço</label>
        <input type="text" name="endereco" value="<?= $Usuario['endereco'] ?>">

        <div class="grid">

            <div>
                <label>Número</label>
                <input type="number" name="numero" value="<?= $Usuario['numero'] ?>">
            </div>

            <div>
                <label>Bairro</label>
                <input type="text" name="bairro" value="<?= $Usuario['bairro'] ?>">
            </div>

            <div>
                <label>Cidade</label>
                <input type="text" name="cidade" value="<?= $Usuario['cidade'] ?>">
            </div>

            <div>
                <label>UF</label>
                <select name="uf">
                    <option disabled selected><?= $Usuario['uf'] ?></option>
                    <option>Acre</option>
                    <option>Alagoas</option>
                    <option>Amapá</option>
                    <option>Amazonas</option>
                    <option>Bahia</option>
                    <option>Ceará</option>
                    <option>Distrito Federal</option>
                    <option>Espírito Santo</option>
                    <option>Goiás</option>
                    <option>Maranhão</option>
                    <option>Mato Grosso</option>
                    <option>Mato Grosso do Sul</option>
                    <option>Minas Gerais</option>
                    <option>Pará</option>
                    <option>Paraíba</option>
                    <option>Paraná</option>
                    <option>Pernambuco</option>
                    <option>Piauí</option>
                    <option>Rio de Janeiro</option>
                    <option>Rio Grande do Norte</option>
                    <option>Rio Grande do Sul</option>
                    <option>Rondônia</option>
                    <option>Roraima</option>
                    <option>Santa Catarina</option>
                    <option>São Paulo</option>
                    <option>Sergipe</option>
                    <option>Tocantins</option>
                </select>
            </div>

        </div>

        <label>Tipo de Usuário</label>
        <select name="id_tipo_usuario">
            <?php foreach($TipoUsuario as $t) : ?>
                <?php if($t['id'] == $Usuario['id_tipo_usuario']) : ?>
                    <option selected value="<?= $t['id'] ?>"><?= $t['nome'] ?></option>
                <?php else : ?>
                    <option value="<?= $t['id'] ?>"><?= $t['nome'] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>

        <div class="buttons">

            <button type="submit">
                Atualizar
            </button>

            <?= anchor(
                'UsuarioController/index',
                'Cancelar',
                ['class' => 'btn-cancelar']
            ) ?>

        </div>

    <?= form_close() ?>

</div>

</body>
</html>