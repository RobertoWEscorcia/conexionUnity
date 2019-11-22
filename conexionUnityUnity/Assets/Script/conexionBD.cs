using System.Collections;
using System.Collections.Generic;
using UnityEngine.Networking;
using UnityEngine;

public class conexionBD : MonoBehaviour
{
    void Start()
    {

        //GET TODA UNA TABLA DE DATOS
        StartCoroutine(GetRequest("http://172.16.25.54/conexion/actividades"));

        //GET UN DATO EN ESPECIFICO DE LA TABLA
        StartCoroutine(GetRequest("http://172.16.25.54/conexion/actividades/1"));

        //POST AGREGA DATOS A LA TABLA ESPECIFICADA
        StartCoroutine(PostRequest("http://172.16.25.54/conexion/actividades/1", "{ \"nombre\": \"Unity\", \"descripcion\" : \"DescripcionUnity\"  }"));

        //PUT URL A DONDE SE MANDA -> DATOS A MODIFICAR
        StartCoroutine(PutRequest("http://172.16.25.54/conexion/actividades/2", "{ \"nombre\": \"Unity\", \"descripcion\" : \"DescripcionUnity\"  }"));

        //DELETE ELIMINA EL DATO CON EL ID Y LA TABLA ESPECIFICADA
        StartCoroutine(DeleteRequest("http://172.16.25.54/conexion/actividades/1"));
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    // PUT -> MODIFICAR
    IEnumerator PutRequest(string url, string data)
    {
        // DATOS QUE SERÁN ENVIADOS A LA BASE DE DATOS
        byte[] myData = System.Text.Encoding.UTF8.GetBytes(data);
        //Se establece el método
        using (UnityWebRequest www = UnityWebRequest.Put(url, myData))
        {
            yield return www.Send();

            if (www.isNetworkError || www.isHttpError)
            {
                print("{\"data\": \"error\"}");
            }
            else
            {
                print("{\"data\": \"ok\"}");
            }
        }
    }


    //GET -> CONSULTAR
    IEnumerator GetRequest(string uri)
    {   
        //Se establece el método
        using (UnityWebRequest webRequest = UnityWebRequest.Get(uri))
        {
            // Solicitud de la página
            yield return webRequest.SendWebRequest();

            if (webRequest.isNetworkError)
            {
                print("{\"data\": \"error\"}");
            }
            else
            {
                print(webRequest.downloadHandler.text);
            }
        }
    }

    //POST -> AGREGAR
    IEnumerator PostRequest(string url, string data)
    {
        //Se incluyen los datos a enviar
        WWWForm form = new WWWForm();
        form.AddField("data", data);
        //Se establece el método
        using (UnityWebRequest www = UnityWebRequest.Post(url, form))
        {
            //Solicitud de la página
            yield return www.SendWebRequest();

            if (www.isNetworkError || www.isHttpError)
            {
                print("{\"data\": \"error\"}");
            }
            else
            {
                print("{\"data\": \"ok\"}");
            }
        }
    }

    //DELETE -> ELIMINAR
    IEnumerator DeleteRequest(string url)
    {
        //Se establece el método
        using (UnityWebRequest www = UnityWebRequest.Delete(url))
        {
            //Solicitud de la página
            yield return www.SendWebRequest();

            if (www.isNetworkError || www.isHttpError)
            {
                print("{\"data\": \"error\"}");
            }
            else
            {
                print("{\"data\": \"ok\"}");
            }
        }
    }
}
