#!/bin/bash

GIT=`which git`
DATE=$(date)
REPO_DIR=/home/emilie/these
echo "Sauvegarde du ${DATE}" >> ~/these/logsavedb.log
mysqldump these these -uemilie -pguadeloupe -h127.0.0.1 > ~/these/dbbackup.sql
echo "OK" >> ~/these/logsavedb.log
cd ${REPO_DIR}
${GIT} commit -am "database backup"
${GIT} push origin master
