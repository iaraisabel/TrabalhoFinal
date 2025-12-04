# TrabalhoFinal
Trabalho Final de Banco de Dados

- index -
<img width="1920" height="1030" alt="index" src="https://github.com/user-attachments/assets/39c15ff5-42d9-43c8-9e77-be854c27d262" />

- telacadastro -
<img width="1920" height="1030" alt="telacadastro" src="https://github.com/user-attachments/assets/da059c97-3907-47d2-b3df-b7937a2460b1" />

- telaformulario -
<img width="1920" height="1026" alt="telaformulario" src="https://github.com/user-attachments/assets/cb936d39-a559-4945-8270-234a50ab0bef" />

- consulta01 -
<img width="1920" height="1032" alt="consulta01" src="https://github.com/user-attachments/assets/53fcb4af-aaa4-414a-b842-26d15dc461ed" />

- consulta02 -
<img width="1920" height="1030" alt="consulta02" src="https://github.com/user-attachments/assets/366c9afe-1090-45e9-a739-a8f57e95ff88" />

- SQL -
  
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
