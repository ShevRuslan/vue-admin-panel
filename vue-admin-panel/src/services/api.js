import axios from "axios";

class Api {
  /**
   * Функция, выполняющая запрос к серверу
   * Параметры:
   * url - путь
   * method - метод (GET | POST | PUT | DELETE)
   * headers - заголовки
   */
  getResource = async (url, data, method, headers = {}) => {
    const response = await axios({
      method: method,
      url: `api/${url}`,
      data: data,
      headers: {
        "Content-Type": "application/json",
        ...headers
      }
    });

    return response.data;
  };
  getCurrency = async data => {
    const response = await this.getResource(`currency/getCurrency`, null, "GET");
    return response;
  };
  getCurrencyHistory = async currency => {
    const response = await this.getResource(`currency/getCurrency/${currency}`, null, "GET");
    return response;
  };
  getAllDirs = async () => {
    const response = await this.getResource(`filemanager/getAllDirs/`, null, "GET");
    return response;
  }
  createDir = async (data) => {
    const response = await this.getResource(`filemanager/createDir/`, data, "POST");
    return response;
  }
}
export default new Api();