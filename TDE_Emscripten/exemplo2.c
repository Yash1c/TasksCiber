// Use o comando abaixo para compilar
// emcc exemplo2.c -o exemplo2.html -sEXPORTED_FUNCTIONS=_int_sqrt -sEXPORTED_RUNTIME_METHODS=ccall,cwrap
#include <math.h>
// python -m http.server 8000 // rodar servidor estatico python
// extern "C"
// {

int int_sqrt(int x)
{
    return sqrt(x);
}
// }

// you man then call
/*
Module.ccall('int_sqrt', // name of C function
  'number', // return type
  ['number'], // argument types
  [28]);
  */
