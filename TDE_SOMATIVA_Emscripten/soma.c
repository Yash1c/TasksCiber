#include <emscripten.h>

// Mantém a função acessível para JavaScript
EMSCRIPTEN_KEEPALIVE
int soma(int a, int b) {
    return a + b; // Retorna a soma de a e b
}
