import {request} from '../request';

/**
 * 登录
 * @param data - 登录数据
 */
export const fetchLogin = (data: any) => request.post('/user/login', data);

/**
 * 获取用户信息
 */
export const fetchUserInfo = () => request.get('/user/info');

/**
 * 获取用户路由数据
 */
export const fetchUserRoutes = () => request.get('/user/menus')

/**
 * 登出
 */
export const fetchLogout = () => request.get('/user/logout')

/**
 * 获取验证码
 */
export const fetchCaptcha = () => request.get('/user/captcha');
