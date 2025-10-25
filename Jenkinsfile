pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "auliaanrhm/uas-fp-laravel"
        DOCKER_TAG = "latest"
        DOCKER_CREDENTIALS = "dockerhub-credentials"
    }

    stages {
        stage('Checkout Code') {
            steps {
                echo '📥 Mengambil kode dari GitHub...'
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                echo '🐳 Membuild image Laravel...'
                bat 'docker build -t %DOCKER_IMAGE%:%DOCKER_TAG% .'
            }
        }

        stage('Push to Docker Hub') {
            steps {
                echo '📦 Push image ke Docker Hub...'
                withCredentials([usernamePassword(credentialsId: "${DOCKER_CREDENTIALS}", usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]) {
                    bat '''
                    docker login -u %USERNAME% -p %PASSWORD%
                    docker push %DOCKER_IMAGE%:%DOCKER_TAG%
                    '''
                }
            }
        }

        stage('Deploy Container') {
            steps {
                echo '🚀 Menjalankan container dari Docker Hub...'
                bat '''
                docker pull %DOCKER_IMAGE%:%DOCKER_TAG%
                docker run -d -p 8082:8000 --name laravel_app %DOCKER_IMAGE%:%DOCKER_TAG%
                '''
            }
        }
    }

    post {
        always {
            echo '✅ Pipeline selesai.'
        }
    }
}
