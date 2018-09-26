#!/bin/bash

GIT=`which git`
DATE=$(date)
REPO_DIR=/home/emilie/these
echo "Sauvegarde du ${DATE}" > ~/these/logsavedb.log
mysqldump these these -uemilie -pguadeloupe -h127.0.0.1 > ~/dbbackup.sql
sh ~/archivebackup.sh
echo "OK" >> ~/these/logsavedb.log
cd ${REPO_DIR}
COMMIT_DATE=$(date +"%y-%m-%d %I:%M:%S")
${GIT} commit -am 'database backup ${COMMIT_DATE}'
${GIT} push origin master
