import axios, { AxiosInstance, AxiosRequestConfig, AxiosResponse } from 'axios';
import { message, notification } from 'antd';
import { attachmentAdpator } from 'amis';
import { goToLoginPage, inLoginPage, Token } from '@/utils/common';

export default class CustomAxiosInstance {
    instance: AxiosInstance;

    constructor(axiosConfig: AxiosRequestConfig) {
        this.instance = axios.create(axiosConfig);
        this.setInterceptor();
    }

    setInterceptor() {
        // 请求拦截器
        this.instance.interceptors.request.use(
            async (config) => {
                const handleConfig = { ...config };
                // 设置token
                const token = Token().value;
                handleConfig.headers.Authorization = `Bearer ${token}`;
                return handleConfig;
            },
            (error) => Promise.reject(error) // 直接传递错误
        );

        // 响应拦截器
        this.instance.interceptors.response.use(
            async (response: AxiosResponse) => {
                // 直接返回响应，或根据需要处理特定逻辑
                return response;
            },
            (error) => {
                const { response } = error;
                // 根据错误状态码处理错误
                switch (response?.status) {
                    case 401:
                        // 特定错误处理...
                        if (!inLoginPage()) {
                            Token().clear();
                            goToLoginPage();
                        }
                        break;
                    default:
                        // 这里捕获所有错误，显示错误信息
                        const errorMsg = response?.data?.error || response?.data?.message || error.message || 'Unknown error';
                        this.showError(errorMsg);
                        break;
                }
                return Promise.reject(error); // 抛出错误，允许局部.catch()处理
            }
        );
    }

    showError(messageText: string) {
        notification.error({
            message: 'Error',
            description: messageText,
        });
    }
}
