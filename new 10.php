gcloud auth list
gcloud config list project






mkdir test && cd test






cat > Dockerfile <<EOF
# Use an official Node runtime as the parent image
FROM node:6

# Set the working directory in the container to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
ADD . /app

# Make the container's port 80 available to the outside world
EXPOSE 80

# Run app.js using node when the container launches
CMD ["node", "app.js"]
EOF


docker build -t node-app:0.1 .

docker run -p 4000:80 --name my-app node-app:0.1

docker stop my-app && docker rm my-app

docker run -p 4000:80 --name my-app -d node-app:0.1

docker ps