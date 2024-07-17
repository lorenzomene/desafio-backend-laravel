# Desafio Picpay Simplificado
## Database
* Users
	* id: uuid primary
	* document_type: int -> enum no codigo -> user = pessoa fisica ou juridica
	* document: string -> cpf/cnpj -> unique com document type
	* email: string -> unique
	* name: string
	* index (document_type, document) -> facilitar buscar
* shopkeeper
* ->  fazer polimorfismo -> mesma table -> tipo field -> User table

* Wallets
	* id: uuid primary
	* user_id: uuid
	* balance: int -> usar os valores como centavos -> R$1.00 -> 100

* Transactions
	* id: uuid primary
	* value: int
	* payer_id: uuid fk wallet
	* payee_id: uuid fk wallet
	* status: string -> sera uma enum no codigo

## notas

valores como int para evitar problemas de arredondamento

