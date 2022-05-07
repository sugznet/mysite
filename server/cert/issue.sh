#!/bin/bash
acme.sh --issue -d daichisugiyama.jp -w /home/www/d.sugiyama/public --force
acme.sh --install-cert -d daichisugiyama.jp \
--key-file       /home/www/d.sugiyama/cert/key.pem  \
--fullchain-file /home/www/d.sugiyama/cert/fullchain.pem \
--reloadcmd     "sudo nginx -s reload"