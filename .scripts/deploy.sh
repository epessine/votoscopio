#!/bin/bash
set -e

echo "Deployment started ..."
echo

start=`date +%s.%N`

echo "Pulling repo ..."
echo

git pull origin

echo
echo "Rebuilding image ..."
echo

docker buildx build --no-cache-filter builder,final --tag 'epessine/votoscopio' .

docker rm -f votoscopio

docker run -d -p 80:80 -p 443:443 -p 443:443/udp --restart=always --env-file .env --name votoscopio epessine/votoscopio

docker image prune -f

end=`date +%s.%N`
runtime=$( echo "$end - $start" | bc -l )

echo
echo "Deployment finished in ${runtime}s"
