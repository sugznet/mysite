#!/bin/bash
export VERSION=1.0
export VERSION_UPDATED="2022/03/15"
export WEB_HOME="/home/www/d.sugiyama"

export PATH="${WEB_HOME}/src/library/js/.bin:$PATH"
export NODE_PATH="${WEB_HOME}/src/library/js:$NODE_PATH"

export DEBUG_MODE=0

export PUBLIC_DIR="${WEB_HOME}/public"
export SRC_DIR="${WEB_HOME}/src"
export CSS_DIR="${WEB_HOME}/public/css"
export JS_DIR="${WEB_HOME}/public/js"
export VIEW_DIR="${WEB_HOME}/src/Views"
. task/inc/functions.sh