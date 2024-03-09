FROM gitpod/workspace-full
USER gitpod
RUN sudo apt-get remove -yq php8.3.3 && \
    sudo add-apt-repository ppa:ondrej/php && \
    sudo apt-get update -q && \
    sudo apt-get install -yq php8.0 && \
    sudo rm -rf /var/lib/apt/lists/*