package main

import (
    "fmt"
    "log"
    "net/http"
    "os"
    "time"
)

func main() {
    mux := http.NewServeMux()

    mux.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
        fmt.Fprintf(w, "apps-go-cloud: hello from %s at %s\n", hostname(), time.Now().Format(time.RFC3339))
    })

    mux.HandleFunc("/healthz", func(w http.ResponseWriter, r *http.Request) {
        w.WriteHeader(http.StatusOK)
        w.Write([]byte("ok"))
    })

    mux.HandleFunc("/version", func(w http.ResponseWriter, r *http.Request) {
        v := os.Getenv("APP_VERSION")
        if v == "" {
            v = "dev"
        }
        fmt.Fprintln(w, v)
    })

    port := os.Getenv("PORT")
    if port == "" {
        port = "8080"
    }

    addr := ":" + port
    log.Printf("listening on %s", addr)
    if err := http.ListenAndServe(addr, mux); err != nil {
        log.Fatal(err)
    }
}

func hostname() string {
    h, err := os.Hostname()
    if err != nil {
        return "unknown"
    }
    return h
}
