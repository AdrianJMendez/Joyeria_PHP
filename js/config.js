
class APIConfig {
    constructor() {
        // Detectar automáticamente la URL base
        this.baseURL = this.detectBaseURL();
        this.projectName = 'Joyeria';
    }

    detectBaseURL() {
        const protocol = window.location.protocol; 
        const hostname = window.location.hostname; 
        const pathname = window.location.pathname; 

        const pathParts = pathname.split('/').filter(p => p && p !== 'index.php');
        const projectPath = pathParts[0] || 'Joyeria';

        return `${protocol}//${hostname}/${projectPath}/`;
    }


    getApiUrl(endpoint) {
        
        if (endpoint.startsWith('http')) {
            return endpoint;
        }

       
        endpoint = endpoint.replace(/^\//, '');

        return this.baseURL + endpoint;
    }

    
    getAssetUrl(path) {
        path = path.replace(/^\//, '');
        return this.baseURL + path;
    }

    
    getPageUrl(page) {
        page = page.replace(/^\//, '');
        return this.baseURL + page;
    }

   
    get JOYAS() {
        return {
            GET_ALL: this.getApiUrl('Controller/joyas.php'),
            GET_ONE: (id) => this.getApiUrl(`Controller/joyas.php?id=${id}`),
            CREATE: this.getApiUrl('Controller/joyas.php'),
            UPDATE: (id) => this.getApiUrl(`Controller/joyas.php?id=${id}`),
            DELETE: (id) => this.getApiUrl(`Controller/joyas.php?id=${id}`)
        };
    }


    get STOCK() {
        return {
            VERIFY: this.getApiUrl('verificar_stock.php'),
            UPDATE: this.getApiUrl('Controller/actualizarStock.php'),
            GET: this.getApiUrl('Controller/obtenerStockAdmin.php')
        };
    }


    get USUARIOS() {
        return {
            LOGIN: this.getApiUrl('Controller/loginController.php'),
            LOGOUT: this.getApiUrl('logout.php'),
            REGISTER: this.getApiUrl('Controller/registroController.php'),
            GET_PROFILE: this.getApiUrl('Controller/usuario.php'),
            UPDATE_PROFILE: this.getApiUrl('Controller/usuario.php')
        };
    }

    get ORDENES() {
        return {
            CREATE: this.getApiUrl('Controller/ordenes.php'),
            GET_ALL: this.getApiUrl('Controller/ordenes.php'),
            GET_ONE: (id) => this.getApiUrl(`Controller/ordenes.php?id=${id}`),
            GET_DETAILS: this.getApiUrl('Controller/ordenDetalle.php'),
            CANCEL: this.getApiUrl('Controller/cancelarPedidoController.php')
        };
    }


    get PAGOS() {
        return {
            CREATE: this.getApiUrl('Controller/pagos.php'),
            GET_ALL: this.getApiUrl('Controller/pagos.php'),
            GET_ONE: (id) => this.getApiUrl(`Controller/pagos.php?id=${id}`)
        };
    }


    get TARJETAS() {
        return {
            GET_ALL: this.getApiUrl('Controller/tarjetas.php'),
            CREATE: this.getApiUrl('Controller/tarjetas.php'),
            DELETE: (id) => this.getApiUrl(`Controller/tarjetas.php?id=${id}`)
        };
    }


    get FACTURAS() {
        return {
            CREATE: this.getApiUrl('Controller/facturas.php'),
            GET_ALL: this.getApiUrl('Controller/facturas.php'),
            GET_ONE: (id) => this.getApiUrl(`Controller/facturas.php?id=${id}`)
        };
    }


    get RELOJES() {
        return {
            GET_ALL: this.getApiUrl('Controller/relojes.php'),
            GET_ONE: (id) => this.getApiUrl(`Controller/relojes.php?id=${id}`)
        };
    }


    get PAGES() {
        return {
            LOGIN: this.getPageUrl('login.php'),
            LOGOUT: this.getPageUrl('logout.php'),
            SHOP: this.getPageUrl('shop.php'),
            PERFIL: this.getPageUrl('perfil.php'),
            PEDIDOS: this.getPageUrl('pedidos.php'),
            CHECKOUT: this.getPageUrl('checkout.php'),
            CART: this.getPageUrl('cart.php'),
            NEWS: this.getPageUrl('news.php'),
            CONTACT: this.getPageUrl('contact.php'),
            ABOUT: this.getPageUrl('about.php')
        };
    }

    get ASSETS() {
        return {
            CSS: (file) => this.getAssetUrl(`css/${file}`),
            JS: (file) => this.getAssetUrl(`js/${file}`),
            IMG: (file) => this.getAssetUrl(`img/${file}`),
            FONTS: (file) => this.getAssetUrl(`fonts/${file}`)
        };
    }
}


const CONFIG = new APIConfig();


async function apiCall(url, options = {}) {
    const defaultOptions = {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        credentials: 'same-origin' 
    };

    const finalOptions = { ...defaultOptions, ...options };

    try {
        const response = await fetch(url, finalOptions);

        if (!response.ok) {
            throw new Error(`Error ${response.status}: ${response.statusText}`);
        }

        return await response.json();
    } catch (error) {
        console.error('API Error:', error);
        throw error;
    }
}


async function apiPost(url, data = {}) {
    return apiCall(url, {
        method: 'POST',
        body: new URLSearchParams(data)
    });
}


async function apiGet(url) {
    return apiCall(url, { method: 'GET' });
}

if (typeof module !== 'undefined' && module.exports) {
    module.exports = { CONFIG, apiCall, apiPost, apiGet };
}
