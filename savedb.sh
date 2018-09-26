#!/bin/bash

GIT=`which git`
DATE=$(date)
REPO_DIR=/home/emilie/these
echo "Sauvegarde du ${DATE}" >> ~/these/logsavedb.log
mysqldump these these -uemilie -pguadeloupe -h127.0.0.1 > ~/these/dbbackup.sql
cd ${REPO_DIR}
${GIT} add --all >> ~/these/logsavedb.log
${GIT} commit -m "database backup"
${GIT} push origin master
echo "OK" >> ~/these/logsavedb.log
