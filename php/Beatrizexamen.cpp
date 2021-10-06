//Se incluyen las librerias
#include <iostream>


using namespace std;


int main(){

//Se declaran la variable bandera y los vectores

int vectora[5], vectorb[5];
int bandera;



//Inicia el ciclo de bandera 
do{
    //este ciclo for llena los valores del primer vector
    for(int f=0; f<5; f++){
        printf("Ingresa los valores numericos");
        scanf("%d", &vectora[f]);

    }
    //Imprime primero los valores del vector 1
    printf("Los valores del vector original: \n");
    for(int i=0; i<=4; i++){
        printf("%d", vectora[i]);
        printf("  ");
    }

    //Este ciclo anidado for cambia los valores del vector 
    for(int j=4; j>=0; j--){
        for(int i=0; i<5;i++){
            vectorb[j]=vectora[i];
        }
    }
    //Imprime los valores del segundo vector
     printf("\nLos valores del vector inverso: \n");
    for(int z=0; z<=4; z++){
        printf("%d", vectorb[z]);
        printf("  ");
    }



    printf("\nPara continuar presiona 1 u otro número para salir");
    scanf("%d", &bandera);

}while (bandera==1);



}
