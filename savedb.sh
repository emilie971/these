#!/bin/bash

GIT=`which git`
DATE=$(date)
REPO_DIR=/homr/emilie/these
echo "Sauvegarde du ${DATE}" >> ~/these/logsavedb.log
mysqldump these these -uemilie -pguadeloupe -h127.0.0.1 > ~/these/dbbackup.sql
cd ${REPO_DIR}
${GIT} add --all .
${GIT} commit -m "Test commit"
echo "FIN" >> ~/these/logsavedb.log
