# syntax=docker/dockerfile:1

# ----- Build stage -----
FROM golang:1.22-alpine AS builder
WORKDIR /src

# Cache dependencies
COPY go.mod ./
COPY go.sum ./
RUN --mount=type=cache,target=/go/pkg/mod \
    go mod download || true

# Copy source
COPY . .
RUN --mount=type=cache,target=/go/pkg/mod \
    CGO_ENABLED=0 GOOS=linux GOARCH=amd64 go build -o /app/app ./...

# ----- Runtime stage -----
FROM gcr.io/distroless/static:nonroot
WORKDIR /app
COPY --from=builder /app/app /app/app
ENV PORT=8080
EXPOSE 8080
USER nonroot:nonroot
ENTRYPOINT ["/app/app"]
