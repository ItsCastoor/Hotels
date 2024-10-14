FROM alpine:latest

RUN apk update && apk upgrade \
    && apk add --no-cache bash nano

WORKDIR /app
COPY . .
CMD  ["tail","-f","/dev/null"]

