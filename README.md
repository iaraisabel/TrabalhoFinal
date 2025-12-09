# TrabalhoFinal
Trabalho Final de Banco de Dados

---

- Este projeto é um sistema web criado para cadastrar alunos e consultar suas informações de forma simples e organizada. Ele inclui páginas para login, cadastro, formulário completo de dados e um painel com visualização de estatísticas em cards e gráficos, permitindo analisar cursos, idades, responsáveis e regiões dos estudantes. É uma solução prática para gestão e acompanhamento de dados estudantis.

---

## SQL

sql
CREATE TABLE cad_aluno (
    nome_completo VARCHAR(100), 
    data_nasc DATE, end_rua VARCHAR(100), 
    end_num INT, end_bairro VARCHAR(100), 
    end_cep INT, resp_nome VARCHAR(100), 
    resp_tipo VARCHAR(20) NOT NULL, 
    curso_nome VARCHAR(100) 
);  

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(150) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL
);

---

## index.php:
<img width="1920" height="1030" alt="index" src="https://github.com/user-attachments/assets/39c15ff5-42d9-43c8-9e77-be854c27d262" />

No arquivo index.php, o usuário encontra três botões principais que facilitam a navegação pelo sistema. O botão “Create One” leva diretamente para a página telacadastro, onde é possível realizar um novo cadastro. Já o botão “Formulario” direciona o usuário para a página telaformulario, destinada ao preenchimento de dados. Por fim, o botão “Login” conduz à página painel.php, onde ocorre o acesso ao painel principal do sistema.

---

## painel.php: 
<img width="1920" height="1029" alt="painel" src="https://github.com/user-attachments/assets/cb8e5f89-7ec6-4431-9f66-c51b29e4a1ed" />

Na página painel.php, o usuário é recebido com a mensagem “Olá, [email cadastrado]”, criando uma experiência mais personalizada. Logo abaixo, o painel apresenta três cards organizados em colunas, exibindo informações importantes de forma visual e acessível.

A navbar oferece a navegação principal do sistema. O botão Navbar mantém o usuário na própria página painel.php. O botão Home retorna ao início do site, enquanto o botão Cadastro direciona para telacadastro. O botão Formulário leva o usuário até telaformulario, e o botão Consultas abre a página consulta.php. Para finalizar a sessão, o botão Logout redireciona para index.php, encerrando o acesso ao painel.

---

## telacadastro.php:
<img width="1920" height="1030" alt="telacadastro" src="https://github.com/user-attachments/assets/da059c97-3907-47d2-b3df-b7937a2460b1" />

A página telacadastro.php apresenta um formulário simples e direto, onde o usuário pode inserir seu nome, email e senha para criar uma nova conta. Após preencher os campos, os dados são enviados ao Banco de Dados 'Users', o botão Register encaminha o usuário para painel.php, permitindo acesso ao sistema. Caso já possua cadastro, o botão Login o redireciona de volta para index.php, onde pode realizar o acesso normalmente.

---

## telaformulario.php:
<img width="1920" height="1026" alt="telaformulario" src="https://github.com/user-attachments/assets/cb936d39-a559-4945-8270-234a50ab0bef" />

A página possui um formulário completo onde o usuário pode inserir seus dados pessoais, incluindo nome completo, data de nascimento, rua, número, bairro, CEP, além das informações do responsável, como nome, tipo de responsável e o curso desejado. Após o preenchimento, o botão Cadastrar envia todos os dados para o Banco de Dados 'Cad_aluno' e, em seguida, direciona o usuário automaticamente para a página consulta.php, onde as informações cadastradas do usuário e dos demais usuários cadastrados podem ser visualizadas.

---

## consulta.php (parte 01):
<img width="1920" height="1032" alt="consulta01" src="https://github.com/user-attachments/assets/53fcb4af-aaa4-414a-b842-26d15dc461ed" />

A página consulta.php reúne diversas consultas geradas a partir dos dados armazenados no banco cad_aluno. Nela, o usuário encontra cards que apresentam informações como o total de alunos, além das quantidades específicas de inscritos nos cursos de Enfermagem, Informática, Desenvolvimento de Sistemas (D.S.) e Administração (ADM). Também é exibida a Média de Idade dos estudantes, organizada no mesmo formato de card para manter a consistência visual.

Além disso, a página conta com dois gráficos informativos: um gráfico de pizza, que mostra a distribuição de alunos por curso, e um gráfico de colunas, que apresenta os tipos de responsáveis mais comuns entre os cadastros. Dessa forma, a consulta oferece uma visão clara e detalhada dos dados cadastrados no sistema.

---

## consulta.php (parte 02):
<img width="1920" height="1030" alt="consulta02" src="https://github.com/user-attachments/assets/366c9afe-1090-45e9-a739-a8f57e95ff88" />

Ainda na página consulta.php, são exibidos mais dois gráficos que enriquecem a análise dos dados. O primeiro é um gráfico de barras que apresenta os bairros mais cadastrados, permitindo identificar as regiões mais comuns entre os alunos. Já o segundo é um gráfico de barras que mostra a distribuição por faixa etária, oferecendo uma visão clara sobre a idade predominante dos estudantes cadastrados. Esses gráficos complementam as consultas, tornando a página ainda mais completa e informativa.

---
