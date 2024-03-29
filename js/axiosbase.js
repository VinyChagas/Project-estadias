const baseURL = "http://127.0.0.1:8000/";
const api = axios.create({ baseURL });

const headersConf = {
  headers: {
    "User-Agent":
      "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0) Gecko/20100101 Firefox/41.0",
    Accept: "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
    "Accept-Language": "en-US,en;q=0.5",
    "Accept-Encoding": " gzip, deflate",
    DNT: "1",
    Origin: "https://web.example.org",
    "Access-Control-Request-Method": "GET",
    "Access-Control-Request-Headers": "authorization",
    Connection: "keep-alive",
    Pragma: "no-cache",
    " Cache-Control": "no-cache",
    Authorization: `Bearer ${localStorage.getItem("refresh_token")}`,
  },
};
