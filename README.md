
# API Cadastro de Pacientes


Vamos la!

Desenvolver um cadastro de pacientes, do qual possamos testar toda sua
capacidade de criação de arquitetura, qualidade do código, validações e
usabilidade.

 A Aplicação


1:
- Consulta de Cep acessando a api VIAcep
- Obserção. A primeira busca do cep vamos até a api pela rota: 
-/api/v1/zip_cod_query/seu-cep-aqui
- Logo em seguida armazenamos essa pesquisa no bando REDIS para próximas consultas
------------------------------------------------------------------------------------------

2:
- Cadastro - Atualização - Remoção e Busca de usuários na base de dados
- Cadastro de usuários através de planilhas CSV enviando a api e ela tratando 
e inserindo em nossa base de dados.

- Existe na raiz do nosso projeto, dois arquivos o endpoint.json(Onde está o 
nosso arquivo do insomina para teste da nossa api), e o 
import.csv(Arquivo com uma simulação de usuários).


ROTAS da nossa aplicação


-ZIPCODE
==========================================================================
/api/v1/zip_cod_query/seu-cep-aqui  --> (Rota para consulta do CEP)

-PACIENTES
==========================================================================
/api/v1/zip_cod_query/seu-cep-aqui  --> (Rota para consulta do CEP)
/api/v1/zip_cod_query/seu-cep-aqui  --> (Rota para consulta do CEP)

## Passo a passo, para rodar a aplicação

Clone o repositório para sua máquina 

```sh
git@github.com:editoSilva/api-cadastro-pacientes.git
```
