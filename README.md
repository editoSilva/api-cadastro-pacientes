
# API Cadastro de Pacientes


## Requisitos para que você possa executar o sistema

Docker
Docker-compose

## Abaixo segue o que iremos resolver nessa aplicação:

- Consulta de Cep acessando a api VIAcep.
- Logo em seguida armazenamos essa pesquisa no bando REDIS para próximas consultas.
- Cadastro - Atualização - Remoção e Busca de usuários na base de dados.
- Cadastro de usuários através de planilhas CSV enviando a api e ela tratando e inserindo em nossa base de dados.
- Existe na raiz do nosso projeto, dois arquivos o endpoint.json(Onde está o 
nosso arquivo do insomina para teste da nossa api), e o 
import.csv(Arquivo com uma simulação de usuários).


# Rotas da nossa aplicação


## CEP
==========================================================================
/api/v1/zip_cod_query/seu-cep-aqui  --> (Rota para consulta do CEP)

## PACIENTES
==========================================================================
/api/v1/zip_cod_query/seu-cep-aqui  --> (Rota para consulta do CEP)
/api/v1/zip_cod_query/seu-cep-aqui  --> (Rota para consulta do CEP)

# Passo a passo:

Clone o repositório para sua máquina 

```sh
git clone https://github.com/editoSilva/api-cadastro-pacientes.git

```

Eu preparei um compilado de comandos em um só, rode na raiz do projeto o seguinte comando abaixo:


```sh
sh script-build-app.sh 
```

Agora dentro da sua aplicação ao fim desse comando automático digite:

```sh
composer install
```

Agora vamos subir o banco de dados da nossa aplicação com o seguinte comando:

```sh
php artisan migrate
```

## Vamos iniciar os testes da aplicação?

Segue a imagem de como será o seu teste na tela.


