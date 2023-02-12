echo "Vamos iniciar nossos comandos..."
sleep 2
echo "Buildando a sua imagem..."
docker-compose build
sleep 2
echo "Subindo os containers..."
docker-compose up -d
sleep 2
echo "Acessando o seu container..."
docker-compose exec app bash

