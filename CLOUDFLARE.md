# Panduan Konfigurasi Cloudflare Security untuk SIREJU

## Overview
Dokumentasi ini menjelaskan langkah-langkah konfigurasi Cloudflare untuk meningkatkan keamanan sistem repository jurnal.

## Prasyarat
- Domain sudah terdaftar dan aktif
- Server hosting sudah siap
- SSL certificate sudah terinstall di server

## Langkah 1: Setup Domain di Cloudflare

### 1.1 Tambah Domain
1. Login ke Cloudflare Dashboard
2. Klik "Add a Site"
3. Masukkan domain Anda (contoh: sireju.example.com)
4. Pilih plan (Free plan sudah cukup untuk kebutuhan dasar)

### 1.2 Update Nameserver
1. Di registrar domain (GoDaddy, Namecheap, dll)
2. Update nameserver ke Cloudflare:
   ```
   ns1.cloudflare.com
   ns2.cloudflare.com
   ```
3. Tunggu propagasi DNS (biasanya 24-48 jam)

## Langkah 2: Konfigurasi DNS

### 2.1 Setup A Record
```
Type: A
Name: @
IPv4 address: [IP_SERVER_ANDA]
Proxy status: Proxied (orange cloud)
```

### 2.2 Setup CNAME untuk www
```
Type: CNAME
Name: www
Target: sireju.example.com
Proxy status: Proxied (orange cloud)
```

## Langkah 3: SSL/TLS Configuration

### 3.1 SSL/TLS Mode
1. Buka tab "SSL/TLS" → "Overview"
2. Set SSL/TLS encryption mode ke **"Full (strict)"**
3. Pastikan server memiliki SSL certificate yang valid

### 3.2 Edge Certificates
1. Buka tab "SSL/TLS" → "Edge Certificates"
2. Enable "Always Use HTTPS"
3. Enable "HTTP Strict Transport Security (HSTS)"
4. Set HSTS Max Age: 6 months

## Langkah 4: Security Settings

### 4.1 Security Level
1. Buka tab "Security" → "Settings"
2. Set Security Level ke **"High"**
3. Enable "Browser Integrity Check"

### 4.2 Bot Fight Mode
1. Buka tab "Security" → "Bots"
2. Enable "Bot Fight Mode"
3. Enable "Super Bot Fight Mode" (jika tersedia)

### 4.3 DDoS Protection
1. Buka tab "Security" → "DDoS"
2. Enable "DDoS Protection"
3. Set sensitivity ke "Medium"

## Langkah 5: Firewall Rules

### 5.1 Protect Admin Area
Buat Firewall Rule untuk melindungi area admin:

**Rule Name**: Protect Admin Area
**Field**: URI Path
**Operator**: starts with
**Value**: /admin
**Action**: Challenge
**Expression**:
```
(http.request.uri.path starts_with "/admin")
```

### 5.2 Rate Limiting untuk Download
Buat Rate Limiting Rule:

**Rule Name**: Download Rate Limit
**Field**: URI Path
**Operator**: starts with
**Value**: /journal/
**Action**: Block
**Rate**: 10 requests per minute
**Expression**:
```
(http.request.uri.path starts_with "/journal/" and http.request.uri.path contains "/download")
```

### 5.3 Block Suspicious IPs
Buat rule untuk memblokir IP yang mencurigakan:

**Rule Name**: Block Suspicious IPs
**Field**: IP Source Address
**Operator**: is in
**Value**: [List IP yang mencurigakan]
**Action**: Block

## Langkah 6: Page Rules

### 6.1 Cache Static Assets
```
URL: sireju.example.com/public/build/*
Settings:
- Cache Level: Cache Everything
- Edge Cache TTL: 1 month
```

### 6.2 Security Headers
```
URL: sireju.example.com/*
Settings:
- Security Level: High
- Browser Integrity Check: On
```

## Langkah 7: Advanced Security

### 7.1 WAF (Web Application Firewall)
1. Buka tab "Security" → "WAF"
2. Enable "Managed Rules"
3. Enable "OWASP Core Ruleset"
4. Enable "Cloudflare Managed Rules"

### 7.2 Rate Limiting Global
1. Buka tab "Security" → "Rate Limiting"
2. Buat rule:
   - **Rule Name**: Global Rate Limit
   - **Rate**: 100 requests per minute
   - **Action**: Block

### 7.3 Security Headers
Tambahkan custom headers di "Transform Rules":

```
Header: X-Frame-Options
Value: DENY

Header: X-Content-Type-Options
Value: nosniff

Header: X-XSS-Protection
Value: 1; mode=block

Header: Referrer-Policy
Value: strict-origin-when-cross-origin
```

## Langkah 8: Monitoring & Analytics

### 8.1 Security Analytics
1. Buka tab "Security" → "Events"
2. Monitor traffic dan threats
3. Set up alerts untuk security events

### 8.2 Performance Monitoring
1. Buka tab "Analytics" → "Web Analytics"
2. Monitor performance metrics
3. Set up alerts untuk downtime

## Langkah 9: Backup & Recovery

### 9.1 DNS Backup
1. Export DNS records
2. Simpan konfigurasi Cloudflare
3. Dokumentasikan semua rules

### 9.2 SSL Certificate Backup
1. Backup SSL certificates
2. Simpan private keys dengan aman
3. Dokumentasikan renewal process

## Langkah 10: Testing & Validation

### 10.1 Security Testing
```bash
# Test SSL configuration
openssl s_client -connect sireju.example.com:443 -servername sireju.example.com

# Test security headers
curl -I https://sireju.example.com

# Test rate limiting
for i in {1..20}; do curl -I https://sireju.example.com; done
```

### 10.2 Performance Testing
```bash
# Test page load speed
curl -w "@curl-format.txt" -o /dev/null -s https://sireju.example.com

# Test CDN performance
curl -H "CF-Cache-Status: HIT" https://sireju.example.com
```

## Monitoring & Maintenance

### Daily Checks
- [ ] Monitor security events
- [ ] Check SSL certificate status
- [ ] Review blocked requests
- [ ] Monitor performance metrics

### Weekly Checks
- [ ] Review firewall rules
- [ ] Check rate limiting effectiveness
- [ ] Update security rules if needed
- [ ] Review analytics reports

### Monthly Checks
- [ ] Review and update security policies
- [ ] Check SSL certificate renewal
- [ ] Review and optimize performance
- [ ] Update documentation

## Troubleshooting

### Common Issues

#### SSL Certificate Errors
```bash
# Check certificate validity
openssl x509 -in certificate.crt -text -noout

# Renew certificate if needed
certbot renew --dry-run
```

#### DNS Propagation Issues
```bash
# Check DNS propagation
dig sireju.example.com
nslookup sireju.example.com
```

#### Performance Issues
1. Check Cloudflare Analytics
2. Review cache settings
3. Optimize images and assets
4. Check server response times

## Security Best Practices

### 1. Regular Updates
- Update Cloudflare rules regularly
- Monitor security advisories
- Keep SSL certificates current

### 2. Access Control
- Use strong passwords
- Enable 2FA for Cloudflare account
- Limit admin access

### 3. Monitoring
- Set up alerts for security events
- Monitor traffic patterns
- Review logs regularly

### 4. Backup
- Regular backup of configurations
- Document all changes
- Test recovery procedures

## Support & Resources

### Cloudflare Resources
- [Cloudflare Documentation](https://developers.cloudflare.com/)
- [Cloudflare Community](https://community.cloudflare.com/)
- [Cloudflare Support](https://support.cloudflare.com/)

### Security Resources
- [OWASP Top 10](https://owasp.org/www-project-top-ten/)
- [Security Headers](https://securityheaders.com/)
- [SSL Labs Test](https://www.ssllabs.com/ssltest/)

### Monitoring Tools
- [GTmetrix](https://gtmetrix.com/)
- [PageSpeed Insights](https://pagespeed.web.dev/)
- [Security Headers](https://securityheaders.com/)

## Contact Information

Untuk bantuan teknis atau pertanyaan tentang konfigurasi Cloudflare, hubungi:
- Email: support@sireju.example.com
- Documentation: https://docs.sireju.example.com
- Issue Tracker: https://github.com/sireju/issues

