#!/bin/bash

mysqldump --no-data -u root -p -h mantis motp  | sed 's/AUTO_INCREMENT=[0-9]*\b//'
