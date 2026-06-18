<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>

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

    <h2>👤 Usuários</h2>

    <?= anchor(
        'HomeController/index',
        '🏠 Home',
        ['class' => 'btn-home']
    ) ?>

    <hr>

    <h3>Novo Usuário</h3>

    <?= form_open('UsuarioController/salvar') ?>

        <input type="number" name="cpf" placeholder="CPF">
        <input type="text" name="nome" placeholder="Nome">
        <input type="email" name="email" placeholder="Email">
        <input type="number" name="telefone" placeholder="Telefone">
        <input type="text" name="endereco" placeholder="Endereço">
        <input type="number" name="numero" placeholder="Nº">
        <input type="text" name="bairro" placeholder="Bairro">
        <input type="text" name="cidade" placeholder="Cidade">

        <select name="uf">
            <option value="" selected disabled>UF</option>
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

        <input type="date" name="data_nascimento">

        <select name="id_tipo_usuario">
            <option value="" selected disabled>Tipo</option>
            <?php foreach($TipoUsuario as $t) : ?>
                <option value="<?= $t['id'] ?>"><?= $t['nome'] ?></option>
            <?php endforeach ?>
        </select>

        <button type="submit">Cadastrar</button>

    <?= form_close() ?>

    <h3>Lista de Usuários</h3>

    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Nº</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>UF</th>
                    <th>Nascimento</th>
                    <th>Tipo</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($Usuario as $u) : ?>
                    <tr>
                        <td>
                            <?= anchor(
                                'UsuarioController/editar/'.$u['cpf'],
                                $u['cpf']
                            ) ?>
                        </td>
                        <td><?= $u['nome'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['telefone'] ?></td>
                        <td><?= $u['endereco'] ?></td>
                        <td><?= $u['numero'] ?></td>
                        <td><?= $u['bairro'] ?></td>
                        <td><?= $u['cidade'] ?></td>
                        <td><?= $u['uf'] ?></td>
                        <td><?= date('d/m/Y', strtotime($u['data_nascimento'])) ?></td>
                        <td>
                            <?php foreach($TipoUsuario as $tipo) : ?>
                                <?php if($tipo['id'] == $u['id_tipo_usuario']) : ?>
                                    <?= $tipo['nome'] ?>
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