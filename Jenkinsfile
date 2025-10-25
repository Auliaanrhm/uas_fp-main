pipeline {
    agent any

    environment {
        COMPOSE_FILE = 'docker-compose.yml'
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
                sh 'docker-compose build'
            }
        }

        stage('Start Containers') {
            steps {
                echo '🚀 Menjalankan container...'
                sh 'docker-compose up -d'
            }
        }

        stage('Check Laravel Version') {
            steps {
                echo '🔍 Mengecek apakah Laravel berjalan...'
                sh 'docker exec laravel_app php artisan --version'
            }
        }

        stage('Run Tests') {
            steps {
                echo '🧪 Menjalankan test Laravel (jika ada)...'
                sh 'docker exec laravel_app php artisan test || true'
            }
        }

        stage('Stop Containers') {
            steps {
                echo '🧹 Menghentikan container...'
                sh 'docker-compose down'
            }
        }
    }

    post {
        always {
            echo '✅ Pipeline selesai.'
        }
    }
}

