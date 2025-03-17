pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/XIXLOT/Projecte.gi>
            }
        }
        stage('Deploy Application') {
            steps {
                sh 'bash deploy.sh'
            }
        }
    }
}
